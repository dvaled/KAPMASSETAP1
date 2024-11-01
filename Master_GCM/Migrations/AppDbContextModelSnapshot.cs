﻿// <auto-generated />
using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Infrastructure;
using Microsoft.EntityFrameworkCore.Storage.ValueConversion;
using Npgsql.EntityFrameworkCore.PostgreSQL.Metadata;

#nullable disable

namespace Master_GCM.Migrations
{
    [DbContext(typeof(AppDbContext))]
    partial class AppDbContextModelSnapshot : ModelSnapshot
    {
        protected override void BuildModel(ModelBuilder modelBuilder)
        {
#pragma warning disable 612, 618
            modelBuilder
                .HasAnnotation("ProductVersion", "8.0.8")
                .HasAnnotation("Relational:MaxIdentifierLength", 63);

            NpgsqlModelBuilderExtensions.UseIdentityByDefaultColumns(modelBuilder);

            modelBuilder.Entity("LOGMODEL", b =>
                {
                    b.Property<int>("LOGID")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("integer");

                    NpgsqlPropertyBuilderExtensions.UseIdentityByDefaultColumn(b.Property<int>("LOGID"));

                    b.Property<string>("ACTIONPERFORMED")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("ASSETCODE")
                        .HasColumnType("text");

                    b.Property<DateOnly>("DATEADDED")
                        .HasColumnType("date");

                    b.Property<string>("ROLE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("USERADDED")
                        .IsRequired()
                        .HasColumnType("text");

                    b.HasKey("LOGID");

                    b.HasIndex("ASSETCODE");

                    b.ToTable("TRN_LOG");
                });

            modelBuilder.Entity("MASTERMODEL", b =>
                {
                    b.Property<int>("MASTERID")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("integer");

                    NpgsqlPropertyBuilderExtensions.UseIdentityByDefaultColumn(b.Property<int>("MASTERID"));

                    b.Property<string>("ACTIVE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("CONDITION")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("DESCRIPTION")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<int>("NOSR")
                        .HasColumnType("integer");

                    b.Property<string>("TYPEGCM")
                        .HasColumnType("text");

                    b.Property<int>("VALUEGCM")
                        .HasColumnType("integer");

                    b.HasKey("MASTERID");

                    b.ToTable("MST_GCM");
                });

            modelBuilder.Entity("MSTEMPLOYEEMODEL", b =>
                {
                    b.Property<int>("NIPP")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("integer");

                    NpgsqlPropertyBuilderExtensions.UseIdentityByDefaultColumn(b.Property<int>("NIPP"));

                    b.Property<string>("ACTIVE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("DEPARTMENT")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("DIRECTORATE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("NAME")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("POSITION")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("UNIT")
                        .IsRequired()
                        .HasColumnType("text");

                    b.HasKey("NIPP");

                    b.ToTable("MST_EMPLOYEE");
                });

            modelBuilder.Entity("TRNASSETHISTORYMODEL", b =>
                {
                    b.Property<int>("IDASSETHISTORY")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("integer");

                    NpgsqlPropertyBuilderExtensions.UseIdentityByDefaultColumn(b.Property<int>("IDASSETHISTORY"));

                    b.Property<string>("ASSETCODE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<DateOnly>("DATEADDED")
                        .HasColumnType("date");

                    b.Property<string>("DEPARTMENT")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("DIRECTORATE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("NAME")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<int>("NIPP")
                        .HasColumnType("integer");

                    b.Property<string>("PICADDED")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("POSITION")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("UNIT")
                        .IsRequired()
                        .HasColumnType("text");

                    b.HasKey("IDASSETHISTORY");

                    b.HasIndex("ASSETCODE");

                    b.HasIndex("NIPP");

                    b.ToTable("TRN_HIST_ASSET");
                });

            modelBuilder.Entity("TRNASSETMODEL", b =>
                {
                    b.Property<int>("IDASSET")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("integer");

                    NpgsqlPropertyBuilderExtensions.UseIdentityByDefaultColumn(b.Property<int>("IDASSET"));

                    b.Property<string>("ACTIVE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<DateOnly>("ADDEDDATE")
                        .HasColumnType("date");

                    b.Property<string>("ASSETBRAND")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("ASSETCATEGORY")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("ASSETCODE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("ASSETMODEL")
                        .HasColumnType("text");

                    b.Property<string>("ASSETSERIALNUMBER")
                        .HasColumnType("text");

                    b.Property<string>("ASSETSERIES")
                        .HasColumnType("text");

                    b.Property<string>("ASSETTYPE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("CONDITION")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<DateOnly?>("DATEUPDATED")
                        .HasColumnType("date");

                    b.Property<int?>("NIPP")
                        .HasColumnType("integer");

                    b.Property<string>("PICADDED")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("PICUPDATED")
                        .HasColumnType("text");

                    b.HasKey("IDASSET");

                    b.HasIndex("NIPP");

                    b.ToTable("TRN_ASSET");
                });

            modelBuilder.Entity("TRNASSETPICTUREMODEL", b =>
                {
                    b.Property<int>("IDASSETPIC")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("integer");

                    NpgsqlPropertyBuilderExtensions.UseIdentityByDefaultColumn(b.Property<int>("IDASSETPIC"));

                    b.Property<string>("ACTIVE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("ASSETCODE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("ASSETPIC")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<DateOnly>("DATEADDED")
                        .HasColumnType("date");

                    b.Property<DateOnly?>("DATEUPDATED")
                        .HasColumnType("date");

                    b.Property<string>("PICADDED")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("PICUPDATED")
                        .HasColumnType("text");

                    b.HasKey("IDASSETPIC");

                    b.HasIndex("ASSETCODE");

                    b.ToTable("TRN_DTL_PICTURE");
                });

            modelBuilder.Entity("TRNASSETSPECMODEL", b =>
                {
                    b.Property<int>("IDASSETSPEC")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("integer");

                    NpgsqlPropertyBuilderExtensions.UseIdentityByDefaultColumn(b.Property<int>("IDASSETSPEC"));

                    b.Property<string>("ASSETCODE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<bool?>("BACKLIGHTKEYBOARD")
                        .HasColumnType("boolean");

                    b.Property<bool?>("BLUETOOTH")
                        .HasColumnType("boolean");

                    b.Property<bool?>("CONVERTIBLE")
                        .HasColumnType("boolean");

                    b.Property<DateOnly>("DATEADDED")
                        .HasColumnType("date");

                    b.Property<DateOnly?>("DATEUPDATED")
                        .HasColumnType("date");

                    b.Property<string>("GRAPHICSBRAND1")
                        .HasColumnType("text");

                    b.Property<string>("GRAPHICSBRAND2")
                        .HasColumnType("text");

                    b.Property<string>("GRAPHICSCAPACITY1")
                        .HasColumnType("text");

                    b.Property<string>("GRAPHICSCAPACITY2")
                        .HasColumnType("text");

                    b.Property<string>("GRAPHICSMODEL1")
                        .HasColumnType("text");

                    b.Property<string>("GRAPHICSMODEL2")
                        .HasColumnType("text");

                    b.Property<string>("GRAPHICSSERIES1")
                        .HasColumnType("text");

                    b.Property<string>("GRAPHICSSERIES2")
                        .HasColumnType("text");

                    b.Property<string>("GRAPHICSTYPE1")
                        .HasColumnType("text");

                    b.Property<string>("GRAPHICSTYPE2")
                        .HasColumnType("text");

                    b.Property<string>("MEMORYBRAND")
                        .HasColumnType("text");

                    b.Property<string>("MEMORYCAPACITY")
                        .HasColumnType("text");

                    b.Property<string>("MEMORYMODEL")
                        .HasColumnType("text");

                    b.Property<string>("MEMORYSERIES")
                        .HasColumnType("text");

                    b.Property<string>("MEMORYTYPE")
                        .HasColumnType("text");

                    b.Property<bool?>("MICROPHONE")
                        .HasColumnType("boolean");

                    b.Property<string>("PICADDED")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("PICUPDATED")
                        .HasColumnType("text");

                    b.Property<string>("PROCESSORBRAND")
                        .HasColumnType("text");

                    b.Property<string>("PROCESSORMODEL")
                        .HasColumnType("text");

                    b.Property<string>("PROCESSORSERIES")
                        .HasColumnType("text");

                    b.Property<string>("SCREENRESOLUTION")
                        .HasColumnType("text");

                    b.Property<bool?>("SPEAKER")
                        .HasColumnType("boolean");

                    b.Property<string>("STORAGEBRAND")
                        .HasColumnType("text");

                    b.Property<string>("STORAGECAPACITY")
                        .HasColumnType("text");

                    b.Property<string>("STORAGEMODEL")
                        .HasColumnType("text");

                    b.Property<string>("STORAGETYPE")
                        .HasColumnType("text");

                    b.Property<bool?>("TOUCHSCREEN")
                        .HasColumnType("boolean");

                    b.Property<bool?>("WEBCAMERA")
                        .HasColumnType("boolean");

                    b.Property<bool?>("WIFI")
                        .HasColumnType("boolean");

                    b.HasKey("IDASSETSPEC");

                    b.HasIndex("ASSETCODE")
                        .IsUnique();

                    b.ToTable("TRN_DTL_SPEC");
                });

            modelBuilder.Entity("TRNMAINTENANCEMODEL", b =>
                {
                    b.Property<int>("MAINTENANCEID")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("integer");

                    NpgsqlPropertyBuilderExtensions.UseIdentityByDefaultColumn(b.Property<int>("MAINTENANCEID"));

                    b.Property<string>("ASSETCODE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<DateOnly>("DATEADDED")
                        .HasColumnType("date");

                    b.Property<string>("NOTES")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("PICADDED")
                        .IsRequired()
                        .HasColumnType("text");

                    b.HasKey("MAINTENANCEID");

                    b.HasIndex("ASSETCODE");

                    b.ToTable("TRN_HIST_MAINTENANCE");
                });

            modelBuilder.Entity("TRNSOFTWAREMODEL", b =>
                {
                    b.Property<int>("IDASSETSOFTWARE")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("integer");

                    NpgsqlPropertyBuilderExtensions.UseIdentityByDefaultColumn(b.Property<int>("IDASSETSOFTWARE"));

                    b.Property<string>("ACTIVE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("ASSETCODE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<DateTime>("DATEADDED")
                        .HasColumnType("timestamp with time zone");

                    b.Property<DateTime?>("DATEUPDATED")
                        .HasColumnType("timestamp with time zone");

                    b.Property<string>("PICADDED")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("PICUPDATED")
                        .HasColumnType("text");

                    b.Property<string>("SOFTWARECATEGORY")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("SOFTWARELICENSE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("SOFTWARENAME")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("SOFTWAREPERIOD")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("SOFTWARETYPE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.HasKey("IDASSETSOFTWARE");

                    b.HasIndex("ASSETCODE");

                    b.ToTable("TRN_DTL_SOFTWARE");
                });

            modelBuilder.Entity("USERMODEL", b =>
                {
                    b.Property<string>("NIPP")
                        .HasColumnType("text");

                    b.Property<string>("ACTIVE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("DEPARTMENT")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("DIRECTORATE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("NAME")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("PASSWORD")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("POSITION")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("ROLE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("UNIT")
                        .IsRequired()
                        .HasColumnType("text");

                    b.Property<string>("USER_PICTURE")
                        .IsRequired()
                        .HasColumnType("text");

                    b.HasKey("NIPP");

                    b.ToTable("MST_USER");
                });

            modelBuilder.Entity("LOGMODEL", b =>
                {
                    b.HasOne("TRNASSETMODEL", "TRNASSET")
                        .WithMany()
                        .HasForeignKey("ASSETCODE")
                        .HasPrincipalKey("ASSETCODE");

                    b.Navigation("TRNASSET");
                });

            modelBuilder.Entity("TRNASSETHISTORYMODEL", b =>
                {
                    b.HasOne("TRNASSETMODEL", "TRNASSET")
                        .WithMany()
                        .HasForeignKey("ASSETCODE")
                        .HasPrincipalKey("ASSETCODE")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.HasOne("MSTEMPLOYEEMODEL", "EMPLOYEE")
                        .WithMany()
                        .HasForeignKey("NIPP");

                    b.Navigation("EMPLOYEE");

                    b.Navigation("TRNASSET");
                });

            modelBuilder.Entity("TRNASSETMODEL", b =>
                {
                    b.HasOne("MSTEMPLOYEEMODEL", "EMPLOYEE")
                        .WithMany()
                        .HasForeignKey("NIPP");

                    b.Navigation("EMPLOYEE");
                });

            modelBuilder.Entity("TRNASSETPICTUREMODEL", b =>
                {
                    b.HasOne("TRNASSETMODEL", "TRNASSET")
                        .WithMany()
                        .HasForeignKey("ASSETCODE")
                        .HasPrincipalKey("ASSETCODE")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.Navigation("TRNASSET");
                });

            modelBuilder.Entity("TRNASSETSPECMODEL", b =>
                {
                    b.HasOne("TRNASSETMODEL", "TRNASSET")
                        .WithOne()
                        .HasForeignKey("TRNASSETSPECMODEL", "ASSETCODE")
                        .HasPrincipalKey("TRNASSETMODEL", "ASSETCODE")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.Navigation("TRNASSET");
                });

            modelBuilder.Entity("TRNMAINTENANCEMODEL", b =>
                {
                    b.HasOne("TRNASSETMODEL", "TRNASSET")
                        .WithMany()
                        .HasForeignKey("ASSETCODE")
<<<<<<< HEAD
                        .HasPrincipalKey("ASSETCODE");
=======
                        .HasPrincipalKey("ASSETCODE")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();
>>>>>>> bc25928e01ca25ff03117de2abb3296a8a77743f

                    b.Navigation("TRNASSET");
                });

            modelBuilder.Entity("TRNSOFTWAREMODEL", b =>
                {
                    b.HasOne("TRNASSETMODEL", "TRNASSET")
                        .WithMany()
                        .HasForeignKey("ASSETCODE")
                        .HasPrincipalKey("ASSETCODE")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.Navigation("TRNASSET");
                });
#pragma warning restore 612, 618
        }
    }
}
